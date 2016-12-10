from itertools import count
from pprint import pprint as pp

from PIL import Image 
import webcolors

AMOUNT_COLORS = 1024*1024
COLOR_MAPPING = {
    "maroon": "red",
    "aqua": "blue",
    "teal": "green",
    'olive': 'brown',
}
NUM_COLORS = 15

class ColorDetection:
    _ids = count(1)

    def __init__(self, img_file):
        self.img = Image.open(img_file)
        self.id = next(self._ids)

    def get_image_colors_str(self):
        rgbs = self._get_main_colors()
        colors = set([self._closest_colour(r[1]) for r in rgbs])
        added_colors = set([COLOR_MAPPING[co] for co in colors if co in COLOR_MAPPING])
        return "_".join([str(self.id).zfill(2)] + list(colors.union(added_colors)))

    def _get_main_colors(self, most_common=NUM_COLORS):
        colors = self.img.getcolors(AMOUNT_COLORS) 
        try:
            return sorted(colors)[-most_common:]
        except TypeError:
            raise Exception("Too many colors in the image")

    def _closest_colour(self, requested_colour):
        min_colours = {}
        # css21 colors https://www.w3.org/TR/css3-color/
        for key, name in webcolors.css21_hex_to_names.items():
            r_c, g_c, b_c = webcolors.hex_to_rgb(key)
            rd = (r_c - requested_colour[0]) ** 2
            gd = (g_c - requested_colour[1]) ** 2
            bd = (b_c - requested_colour[2]) ** 2
            min_colours[(rd + gd + bd)] = name
        return min_colours[min(min_colours.keys())]


if __name__ == "__main__":
    import glob

    for img in glob.glob("images/material-design/*_full.jpg"):
        print(img)
        cd = ColorDetection(img)
        colors = cd.get_image_colors_str()
        print(colors)
        print("---")
