# import keyboard
# import random
# import time

# names = open('names.txt', encoding='utf-8').readlines()
# projs = open('projs.txt', encoding='utf-8').readlines()

# keyboard.write('')
# time.sleep(3)


# def names_def():
#     for i, name in enumerate(names, 2):
#         name = name.replace('\n', '')

#         keyboard.write(str(i))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(name)
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(
#             f'{random.randint(1989, 2007)}-{random.randint(1, 12):02}-{random.randint(1, 28):02}')
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(random.choice(['A', 'B', "C"]))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(f"{name}@mail.com".lower().replace(' ', ''))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(name.lower().replace(' ', ''))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(str(random.randint(0, 1)))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(str(random.randint(0, 1)))
#         # time.sleep(.05)
#         keyboard.send('tab')


# def projs_def():
#     for i, proj in enumerate(projs, 2):
#         proj = proj.replace('\n', '')

#         keyboard.write(str(i))
#         # time.sleep(.05)
#         keyboard.send('tab')

#         keyboard.write(proj)
#         # time.sleep(.05)
#         keyboard.send('tab')

#         t_init = random.randint(432000, 1296000)
#         init = time.localtime(time.time() - t_init)
#         keyboard.write(f'{init.tm_year}-{init.tm_mon:02}-{init.tm_mday:02}')
#         # time.sleep(.05)
#         keyboard.send('tab')

#         prev = time.localtime(time.time() + random.randint(432000, 1296000))
#         keyboard.write(f'{prev.tm_year}-{prev.tm_mon:02}-{prev.tm_mday:02}')
#         # time.sleep(.05)
#         keyboard.send('tab')

#         term = time.localtime(time.time() + random.randint(432000, t_init))
#         keyboard.write(f'{term.tm_year}-{term.tm_mon:02}-{term.tm_mday:02}')
#         # time.sleep(.05)
#         keyboard.send('tab')

# names_def()
# # here
print("<svg>")
for i in range(10):
    sla = 190 + i * 12.2
    print("<ellipse style=\"fill: none; stroke: rgb(0, 0, 0);\" cx=\"192.2\" cy=\"", sla,"\" rx=\"8.842\" ry=\"2.456\"></ellipse>")
print("</svg>")


