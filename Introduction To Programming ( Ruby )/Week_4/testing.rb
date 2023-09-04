def main
  my_array = Array.new(4)
  my_array = ["kotno","anjg","meme",nil]
  i = 0
  while i < my_array.length
    if my_array[i] == nil
      puts "0"
    else
      puts my_array[i]
    end
    i+=1
  end
end

main
