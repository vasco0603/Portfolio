def read_user_age(prompt)
    age=0
    begin
        puts (prompt + age.to_s)
        age+=1
    end while (age<6)
    return age
end

def main()
    prompt = "Anak anjing"
    read_user_age(prompt)
end

main()
