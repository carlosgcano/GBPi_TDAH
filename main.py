from interfaz import *

from points_utils import *
import matplotlib
matplotlib.use("Qt5Agg")
import matplotlib.pyplot as plt
from matplotlib.backends.backend_qt5agg import (FigureCanvasQTAgg as FigureCanvas,NavigationToolbar2QT as NavigationToolbar)

class MainWindow(QtWidgets.QMainWindow, Ui_MainWindow):

    def __init__(self, *args, **kwargs):
        QtWidgets.QMainWindow.__init__(self, *args, **kwargs)
        self.setupUi(self) 
        self.label.setText("Haz clic en Ok")
        self.buttonBox.button(QtWidgets.QDialogButtonBox.Cancel).setText("Cerrar")
        #self.buttonBox.button(QtWidgets.QDialogButtonBox.Ok).clicked.connect(self.actualizar)    
        self.buttonBox.button(QtWidgets.QDialogButtonBox.Cancel).clicked.connect(self.close)    
        
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

    #def actualizar(self):
    #    self.label.setText("Has presionado!")

if __name__ == "__main__":
    app = QtWidgets.QApplication([])
    window = MainWindow()
    
    trophies_points,medals_points = Points_Utils.get_trophies_and_medals_from_points()
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
