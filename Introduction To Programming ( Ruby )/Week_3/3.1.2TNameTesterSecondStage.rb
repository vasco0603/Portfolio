require './input_functions'

# you need to complete the following procedure that prints out 
# "<Name> is a " then print 'silly' (60 times) on one long line
# then print ' name.' \newline

def print_silly_name(name)
	puts(name + " is a")
	i=0
	while(i<60)
		print("silly ")
		i+=1
	end
	puts("name!")
	# complete the code needed here - you will need a loop.
end

# copy your code from the previous stage below and 
# change it to call the procedure above, passing in the name:
def main()
	puts("What is your name?")
	name=gets.chomp
	print_silly_name(name)
end

# put your main() from stage one here

main()
