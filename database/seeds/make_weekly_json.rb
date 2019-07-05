require 'json'
require 'time'

text = File.read('database/seeds/syokudo.txt')

menus = []

dates = []

[*1..5, *8..12, *16..19, *22..26, *29..31].each do |i|
    dates << "2019-07-%02d" % [i]
end

text.split(/\R/).each do |line|
    name = line.match(/^\S+/)[0]
    numbers = line.scan(/[\d\.]+/)

    menus << {
        menu: {
            name: name,
            price: numbers[0],
            energy: numbers[1],
            protein: numbers[2],
            lipid: numbers[3],
            salt: numbers[4],
        },
        dates: dates,
    }
end

puts JSON.pretty_generate(menus)