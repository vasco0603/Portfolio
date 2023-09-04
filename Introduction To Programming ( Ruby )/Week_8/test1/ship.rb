require './input_functions'

# Complete the code below
# Use input_functions to read the data from the user
class Ship
  attr_accessor :name, :id, :origin, :destination
  def initialize(name, id, origin, destination)
    @name = name
    @id = id
    @origin = origin
    @destination = destination
  end
end

def read_a_ship()
  name = read_string("Enter ship name:")
  id = read_integer("Enter ship id:")
  origin = read_string("Enter port of origin:")
  destination = read_string("Enter destination port:")
  ship = Ship.new(name, id, origin, destination)
  return ship
end

def read_ships()
  count_ships = read_integer("How many ships are you entering:")
  ships = Array.new()
  i = 0
  while i < count_ships
    ship = read_a_ship()
    ships << ship
    i+=1
  end
  return ships
end

def print_a_ship(ship)
  puts("Ship name: #{ship.name}")
  puts("Ship id: #{ship.id}")
  puts("Port of origin: #{ship.origin}")
  puts("Destination port: #{ship.destination}")
end

def print_ships(ships)
  i = 0
  while i < ships.length
    print_a_ship(ships[i])
    i+=1
  end
end

def main()
	ships = read_ships()
	print_ships(ships)
end

main()
