=begin
def argument(arg)
    puts("asdads"+arg)
end

def main()
    argument('SKSK')
end
=end

=begin
class Demo
    def first_procedure(x)
        @shared_variable = x
        second_procedure()
    end
    def second_procedure()
        puts("The shared variable: #{@shared_variable}")
    end
end

def main()
    demo = Demo.new().first_procedure(42)
end
=end

=begin
def practice(x)
    while (x<10)
        x+=1
        puts(x)
    end
end

def main()
    puts("number: ")
    number=gets.chomp.to_i()
    practice(number)
end
=end

main()