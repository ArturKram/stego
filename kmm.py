from tkinter.filedialog import askopenfilename
from tkinter.filedialog import asksaveasfilename
from tkinter.messagebox import showinfo
print("Выберите лог-файл:")
provfile = askopenfilename(title="Выберите лог файл для проверки")
print("Выбран:"+ provfile)
showinfo(title="Внимание", message="Пожалуйста вернитесь к консоли")
stegprog = input('Введите имя устанавливаемой программы:')
file1 = open(provfile, "r", encoding='utf-8')
showinfo(title="Внимание", message="Сейчас откроется окно, для выбора места сохранения результата. Пожалуйста перейдите к нему.")
fileprg = open(asksaveasfilename(title="Куда сохранить результат?"),'w+')
while True:
    # считываем строку
    line = file1.readline()
    # прерываем цикл, если строка пустая
    if not line:
        break
    # выводим строку
    if (line.find(stegprog)>1):
       # print(line)
    #вывод результата в файл
        fileprg.write(line)  #
fileprg.close()  # закрытие файла
print("Файл проверен, результат сохранен в:",fileprg)
# закрываем файл
file1.close
