#!/usr/bin/python
# -*- coding: utf-8 -*- 
from __future__ import print_function
import glob
import os
import re
import sys
from PIL import Image

from color_detection import ColorDetection
 
IMAGES = "../images"
THUMB = "_thumb"
FULL = "_full"

class Portfolio:

  def __init__(self, directory):
    self.directory = os.path.join(IMAGES, directory)
    self.imageQueue = list(self._get_images_to_process())

  def _get_images_to_process(self):
    for im in glob.glob(os.path.join(self.directory, "*")):
      if THUMB in im or FULL in im:
        continue
      yield im

  def resize_image(self, image, width, thumb):
    """ modified source from http://pythoncentral.io/resize-image-python-batch/ """
    try:
      width = int(width)
    except:
      raise ValueError("Provide width (%s) is not an integer value" % str(width))
    if not os.path.isfile(image):
      raise IOError("Image path not found: %s" % image)
    try:
      img = Image.open(image)
    except: 
      raise IOError("Not an image file, or cannot process it")
    # Calculate the height using the same aspect ratio
    widthPercent = (width / float(img.size[0]))
    if thumb:
      height = width
    else:
      height = int((float(img.size[1]) * float(widthPercent)))
    img = img.resize((width, height), Image.BILINEAR)
    ext = os.path.splitext(image)[1] if "." else ""
    name = ColorDetection(image).get_image_colors_str()
    name += (THUMB if thumb else FULL) + ext
    outFile = os.path.join(os.path.dirname(image), name)
    img.save(outFile)
    return outFile

if __name__ == "__main__":
  if len(sys.argv) < 4:
    sys.exit("%s dirname thumbWidth fullWidth" % sys.argv[0])
  dirname = sys.argv[1]
  thumbWidth = sys.argv[2]
  fullWidth = sys.argv[3]
  p = Portfolio(dirname)
  for im in p.imageQueue:
    thumbImg = p.resize_image(im, thumbWidth, thumb=True)
    zoomImg = p.resize_image(im, fullWidth, thumb=False)
    print("OK: thumb img: %s, zoom img: %s" % (thumbImg, zoomImg))
