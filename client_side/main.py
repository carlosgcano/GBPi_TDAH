from interfaz import *
from utils import *
import matplotlib
matplotlib.use("Qt5Agg")
import matplotlib.pyplot as plt
from matplotlib.backends.backend_qt5agg import (FigureCanvasQTAgg as FigureCanvas,NavigationToolbar2QT as NavigationToolbar)
import os
import subprocess


class MainWindow(QtWidgets.QMainWindow, Ui_MainWindow):

    os.chdir("/home/c/Escritorio/qt5/client_side")
    total_data=Utils.get_all()
    trophies_points,medals_points = Utils.get_trophies_and_medals_from_points(total_data)
    game_time = Utils.get_game_time(total_data)

    def __init__(self, *args, **kwargs):
        QtWidgets.QMainWindow.__init__(self, *args, **kwargs)
        self.setupUi(self) 


    def keyPressEvent(self, event):    
        if event.key() == QtCore.Qt.Key_Down and self.stackedWidget.currentIndex()==0 and self.trophies_points>0:
            print("entra_en_lista_juegos")
            self.stackedWidget.setCurrentIndex(1)
            self.listWidget.setCurrentRow (0)
        elif event.key() == QtCore.Qt.Key_Up and self.stackedWidget.currentIndex()==1:
            print("entra_en_Principal")
            if self.listWidget.currentRow() == 0:
                self.stackedWidget.setCurrentIndex(0)
            else:
                self.listWidget.setCurrentRow (self.listWidget.currentRow()-1)
        elif event.key() == QtCore.Qt.Key_Down and self.stackedWidget.currentIndex()==1:
            if self.listWidget.currentRow() < 0:  
                self.listWidget.setCurrentRow (0)
            else:
                if(self.listWidget.currentRow() < self.listWidget.count()-1):
                    self.listWidget.setCurrentRow (self.listWidget.currentRow()+1)
            
        elif event.key() == QtCore.Qt.Key_B and self.stackedWidget.currentIndex()==1:         
            self.execute_game()
            
    def execute_game(self):      
        os.system("timeout -k 10 "+self.game_time+"s  /usr/bin/vba games/"+self.listWidget.currentItem().text()+".gb")
        juego=self.listWidget.currentItem().text()+".gb"

if __name__ == "__main__":
    app = QtWidgets.QApplication([])
    window = MainWindow()

    window.total_data=Utils.get_all()

    fig1, ax1 = plt.subplots()
    sizes1, colors1 = Utils.generate_subjects_for_pie(window.total_data)
    ax1.pie(sizes1, colors=colors1)
    ax1.axis('equal') 
    ax1.set_xlabel('Subjets')
    window.canvas = FigureCanvas(fig1)
    window.mplvl.addWidget(window.canvas)  

    sizes2, colors2 = Utils.generate_actitudes_for_pie(window.total_data)
    fig2, ax2 = plt.subplots()
    ax2.pie(sizes2, colors=colors2)
    ax2.axis('equal') 
    ax2.set_xlabel('Actitudes')
    window.canvas = FigureCanvas(fig2)
    window.mplvl_2.addWidget(window.canvas)

    window.canvas.draw()

    x_pos=-52
    for j in range(window.medals_points):        
        x_pos+=52
        print(x_pos)
        name="medal_"+str(j)
        window.add_medal(name, x_pos) 
    if window.trophies_points < 1:
        window.down_arrow.setPixmap(QtGui.QPixmap(""))
    else:        
        for i in range(window.trophies_points):        
            x_pos+=52
            name="trophy_"+str(i)
            window.add_trophy(name, x_pos)
        for index in range(window.listWidget.count()-window.trophies_points):
            window.listWidget.takeItem(0)

    window.show()
    app.exec_()