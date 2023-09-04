require 'gosu'

#define the "prototype" of your application
class MyWindow < Gosu::MyWindow

    #initial values when application load
    def initialize()
        super 800,600,false
        self.caption = "My Window"
    end

    #put main logic of program inside update()
    def update()
    end

    #callback to handle inputs from user, such as mouse and keyboard
    def button_down(id)

    end

    #draw the interface inside draw
    def draw()

    end
end
#start your application by constructing an instance of prototype
window = MyWindow.new()
window.show()