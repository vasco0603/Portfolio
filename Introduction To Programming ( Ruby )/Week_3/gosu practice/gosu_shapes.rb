require 'rubygems'
require 'gosu'
require './circle'

# The screen has layers: Background, middle, top
module ZOrder
  BACKGROUND, MIDDLE, TOP = *0..2
end

class DemoWindow < Gosu::Window
  def initialize
    super(640, 400, false)
  end

  def draw
    # see www.rubydoc.info/github/gosu/gosu/Gosu/Color for colours
    draw_quad(0, 0, 0xff_ffffff, 640, 0, 0xff_ffffff, 0, 400, 0xff_ffffff, 640, 400, 0xff_ffffff, ZOrder::BACKGROUND)
    #draw_quad(5, 10, Gosu::Color::BLUE, 200, 10, Gosu::Color::AQUA, 5, 150, Gosu::Color::FUCHSIA, 200, 150, Gosu::Color::RED, ZOrder::MIDDLE)
    draw_triangle(255, 300, 0xff_cc6600, 385, 300, 0xff_cc6600, 320, 225, 0xff_cc6600, ZOrder::TOP, mode=:default)
    #draw_line(200, 200, Gosu::Color::BLACK, 350, 350, Gosu::Color::BLACK, ZOrder::TOP, mode=:default)
    # draw_rect works a bit differently:
    Gosu.draw_rect(270, 300, 100, 500, 0xff_990000, ZOrder::TOP, mode=:default)

    Gosu.draw_rect(0, 375, 640, 300, 0xff_009900, ZOrder::MIDDLE, mode=:default)

    # Circle parameter - Radius
    #img2 = Gosu::Image.new(Circle.new(50))
    img = Gosu::Image.new(Circle.new(40)) 
    #img.draw(300, 100, ZOrder::TOP, 0.5, 1.0, Gosu::Color::RED)
    # Image draw parameters - x, y, z, horizontal scale (use for ovals), vertical scale (use for ovals), colour
    # Colour - use Gosu::Image::{Colour name} or .rgb({red},{green},{blue}) or .rgba({alpha}{red},{green},{blue},)
    # Note - alpha is used for transparency.
    # drawn as an elipse (0.5 width:)
    #img2.draw(200, 200, ZOrder::TOP, 0.5, 1.0, Gosu::Color::BLUE)
    # drawn as a red circle:
    img.draw(475, 50, ZOrder::TOP, 1.0, 1.0, 0xff_ffff00)
    # drawn as a red circle with transparency:
    #img2.draw(300, 250, ZOrder::TOP, 1.0, 1.0, 0x64_ff0000)

  end
end

DemoWindow.new.show
