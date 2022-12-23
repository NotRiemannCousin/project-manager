import keyboard
import random
import time

names = open('names.txt',encoding='utf-8').readlines()


keyboard.write('')
time.sleep(3)

for i, name in enumerate(names, 2):
    name = name.replace('\n', '')


    keyboard.write(str(i))
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(name)
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(f'{random.randint(1989, 2007)}-{random.randint(1, 12):02}-{random.randint(1, 28):02}')
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(random.choice(['A', 'B', "C"]))
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(f"{name}@mail.com".lower().replace(' ', ''))
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(name.lower().replace(' ', ''))
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(str(random.randint(0,1)))
    # time.sleep(.05)
    keyboard.send('tab')

    keyboard.write(str(random.randint(0,1)))
    # time.sleep(.05)
    keyboard.send('tab')
