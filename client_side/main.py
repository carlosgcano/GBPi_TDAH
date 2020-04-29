from interfaz import *

from utils import *
import matplotlib
matplotlib.use("Qt5Agg")
import matplotlib.pyplot as plt
from matplotlib.backends.backend_qt5agg import (FigureCanvasQTAgg as FigureCanvas,NavigationToolbar2QT as NavigationToolbar)

class MainWindow(QtWidgets.QMainWindow, Ui_MainWindow):

    def __init__(self, *args, **kwargs):
        QtWidgets.QMainWindow.__init__(self, *args, **kwargs)
        self.setupUi(self) 
        #self.buttonBox.button(QtWidgets.QDialogButtonBox.Cancel).setText("Cerrar")
        #self.buttonBox.button(QtWidgets.QDialogButtonBox.Ok).clicked.connect(self.actualizar)    
        #self.buttonBox.button(QtWidgets.QDialogButtonBox.Cancel).clicked.connect(self.close)    
        #self.mplwindow.clicked.connect(self.actualizar)
        #self.pushButton.clicked.connect(self.changePage)
        #QtGui.QShortcut(QtCore.Qt.Key_Up, self, self.changePage)


    def keyPressEvent(self, event):
        window = MainWindow()
        if event.key() == QtCore.Qt.Key_Right and self.stackedWidget.currentIndex()==0:
            print("entra")
            self.stackedWidget.setCurrentIndex(1)
        elif event.key() == QtCore.Qt.Key_Left and self.stackedWidget.currentIndex()==1:
            print("entra2")
            self.stackedWidget.setCurrentIndex(0)
        elif event.key() == QtCore.Qt.Key_Down and self.stackedWidget.currentIndex()==0:
            print("entra3")
            self.stackedWidget.setCurrentIndex(2)
        elif event.key() == QtCore.Qt.Key_Up and self.stackedWidget.currentIndex()==2:
            print("entra4")
            self.stackedWidget.setCurrentIndex(0)
        
if __name__ == "__main__":
    app = QtWidgets.QApplication([])
    window = MainWindow()

    total_data=Utils.get_all()

    fig1, ax1 = plt.subplots()
    sizes1, colors1 = Utils.generate_subjects_for_pie(total_data)
    ax1.pie(sizes1, colors=colors1)
    ax1.axis('equal') 
    ax1.set_xlabel('Subjets')
    window.canvas = FigureCanvas(fig1)
    window.mplvl.addWidget(window.canvas)  

    sizes2, colors2 = Utils.generate_actitudes_for_pie(total_data)
    fig2, ax2 = plt.subplots()
    ax2.pie(sizes2, colors=colors2)
    ax2.axis('equal') 
    ax2.set_xlabel('Actitudes')
    window.canvas = FigureCanvas(fig2)
    window.mplvl_2.addWidget(window.canvas)

    fig3, ax3 = plt.subplots()
    ax3.pie(sizes1, colors=colors1)
    ax3.axis('equal') 
    window.canvas = FigureCanvas(fig3)
    window.mplvl_3.addWidget(window.canvas)
    ax3.set_xlabel('easy come, easy go')

    window.canvas.draw()


    trophies_points,medals_points = Utils.get_trophies_and_medals_from_points(total_data)
    x_pos=-52
    for i in range(trophies_points):        
        x_pos+=52
        print(x_pos)
        name="trophy_"+str(i)
        window.add_trophy(name, x_pos)

    for j in range(medals_points):        
        x_pos+=52
        print(x_pos)
        name="medal_"+str(j)
        window.add_medal(name, x_pos) 

    window.show()
    app.exec_()
