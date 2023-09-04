# Fix up the following code that it works and produces the expected output
# in the task specification.

# Asks the user to enter their age and returns an integer age
def get_age()
    puts("Enter your age in years: ")
    age_in_years = gets.chomp.to_i()
    return age_in_years
end
  
# takes a argument which is a string prompt and displays it to the user then returns the
# entered string
def get_string()
    puts("Enter your name: ")
    s = gets.chomp.to_s()
    return s
end
  
  # Calculate the year born based on the parameter age and print that out
  # along with the name of the user (pass in: name, age) 
def print_year_born(age_now,name_now)
    year_born = 2022-age_now
    puts(name_now + " You were born in: " + year_born.to_s())
end

def main()
    age = get_age()
    name = get_string()
    print_year_born(age,name)
end
  
main()