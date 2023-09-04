module Family
  Woodwind, String, Percussion, Brass = *0..2
end

Family_names = ["Woodwind", "String", "Percussion", "Brass"]

# Put your record definition here
class Family
  attr_accessor :name, :family, :chromatic
end
# use the keywords class and attr_accessor
# remember each field must have a : before it e.g :field
# Don't have an initialize() method.
