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

        sizes1 = [20,20,20,20,20]
        fig1, ax1 = plt.subplots()
        ax1.pie(sizes1)
        ax1.axis('equal') 
        self.canvas = FigureCanvas(fig1)
        self.mplvl.addWidget(self.canvas)
        self.canvas.draw()

        sizes2 = [25,25,25,25]
        fig2, ax2 = plt.subplots()
        ax2.pie(sizes2)
        ax2.axis('equal') 
        self.canvas = FigureCanvas(fig2)
        self.mplvl_2.addWidget(self.canvas)
        self.canvas.draw()

        sizes3 = [20,20,20,20,20]
        fig3, ax3 = plt.subplots()
        ax3.pie(sizes1)
        ax3.axis('equal') 
        self.canvas = FigureCanvas(fig3)
        self.mplvl_3.addWidget(self.canvas)
        self.canvas.draw()

    def actualizar(self):
        QMessageBox.information(self, "Tipo de clic",
                                "Hiciste click.")

    def changePage(self):
        print("entra3")
        if self.stackedWidget.currentIndex()==0:
            self.stackedWidget.setCurrentIndex(1)
        else:
            self.stackedWidget.setCurrentIndex(0)

    def keyPressEvent(self, event):
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
    
    trophies_points,medals_points = Utils.get_trophies_and_medals_from_points()
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
