require 'json'

text = File.read('database/seeds/shokudo201907.txt')

menus = []

text.split(/\R\R/).each do |chunk|
    lines = chunk.split(/\R/)
    
    #0行目　日付
    dates = lines[0].scan(/(\d+)月(\d+)日/).map{ |d| "2019-%02d-%02d" % d.map(&:to_i) }
    
    #1行目　Aセットメニュー名
    menu_a_names = lines[1].split(' ')

    #2行目　Aセットエネルギー
    menu_a_energys = lines[2].scan(/(\d+|\d+\.\d+)kcal (\d+|\d+\.\d+)ｇ (\d+|\d+\.\d+)ｇ (\d+|\d+\.\d+)ｇ/)

    #3行目　Bセットメニュー名
    menu_b_names = lines[3].split(' ')

    #4行目　Bセットエネルギー
    menu_b_energys = lines[4].scan(/(\d+|\d+\.\d+)kcal (\d+|\d+\.\d+)ｇ (\d+|\d+\.\d+)ｇ (\d+|\d+\.\d+)ｇ/)

    dates.each_with_index do |date, i|
        menus << {
            menu: {
                name: menu_a_names[i],
                price: 420,
                energy: menu_a_energys[i][0],
                protein: menu_a_energys[i][1],
                lipid: menu_a_energys[i][2],
                salt: menu_a_energys[i][3],
            },
            schedule: {
                type: 'A',
                date: date,
            }

        }

        menus << {
            menu: {
                name: menu_b_names[i],
                price: 360,
                energy: menu_b_energys[i][0],
                protein: menu_b_energys[i][1],
                lipid: menu_b_energys[i][2],
                salt: menu_b_energys[i][3],
            },
            schedule: {
                type: 'B',
                date: date,
            }

        }
    end
end

puts JSON.pretty_generate(menus)
