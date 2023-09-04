# Fix up the following code that it works and produces the expected output
# in the task specification.

# Asks the user to enter their age and returns an integer age
def get_age()
    puts("Enter your age in years: ")
    age = gets
    return age_in_years
end
  
# takes a argument which is a string prompt and displays it to the user then returns the
# entered string
def get_string()
    puts(prompt)
    s = gets()
    return s
end
  
  # Calculate the year born based on the parameter age and print that out
  # along with the name of the user (pass in: name, age) 
def print_year_born(age)
    year_born = Date.today.year -  age
    puts("You were born in: " + year_born)
end
  
def main()
    age = get_age()
    name = get_string()
    print_year_born(age)
end
  
main()