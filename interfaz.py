# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file 'interfaz.ui'
#
# Created: Fri Apr 17 21:16:44 2020
#      by: PyQt5 UI code generator 5.3.2
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_MainWindow(object):
    def setupUi(self, MainWindow):
        MainWindow.setObjectName("MainWindow")
        MainWindow.resize(349, 322)
        self.centralwidget = QtWidgets.QWidget(MainWindow)
        self.centralwidget.setObjectName("centralwidget")
        self.stackedWidget = QtWidgets.QStackedWidget(self.centralwidget)
        self.stackedWidget.setGeometry(QtCore.QRect(0, 0, 341, 311))
        self.stackedWidget.setObjectName("stackedWidget")
        self.page = QtWidgets.QWidget()
        self.page.setObjectName("page")
        self.premios = QtWidgets.QWidget(self.page)
        self.premios.setGeometry(QtCore.QRect(20, 200, 311, 80))
        self.premios.setObjectName("premios")
        self.mplwindow = QtWidgets.QWidget(self.page)
        self.mplwindow.setEnabled(False)
        self.mplwindow.setGeometry(QtCore.QRect(10, 20, 141, 161))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Preferred, QtWidgets.QSizePolicy.Preferred)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.mplwindow.sizePolicy().hasHeightForWidth())
        self.mplwindow.setSizePolicy(sizePolicy)
        self.mplwindow.setMaximumSize(QtCore.QSize(573, 16777215))
        self.mplwindow.setMouseTracking(False)
        self.mplwindow.setObjectName("mplwindow")
        self.mplvl = QtWidgets.QVBoxLayout(self.mplwindow)
        self.mplvl.setContentsMargins(0, 0, 0, 0)
        self.mplvl.setObjectName("mplvl")
        self.mplwindow_2 = QtWidgets.QWidget(self.page)
        self.mplwindow_2.setEnabled(False)
        self.mplwindow_2.setGeometry(QtCore.QRect(160, 20, 151, 161))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Preferred, QtWidgets.QSizePolicy.Preferred)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.mplwindow_2.sizePolicy().hasHeightForWidth())
        self.mplwindow_2.setSizePolicy(sizePolicy)
        self.mplwindow_2.setMaximumSize(QtCore.QSize(573, 16777215))
        self.mplwindow_2.setObjectName("mplwindow_2")
        self.mplvl_2 = QtWidgets.QVBoxLayout(self.mplwindow_2)
        self.mplvl_2.setContentsMargins(0, 0, 0, 0)
        self.mplvl_2.setObjectName("mplvl_2")
        self.down_arrow = QtWidgets.QLabel(self.page)
        self.down_arrow.setGeometry(QtCore.QRect(130, 290, 71, 21))
        self.down_arrow.setText("")
        self.down_arrow.setPixmap(QtGui.QPixmap("images/down-arrow.gif"))
        self.down_arrow.setScaledContents(True)
        self.down_arrow.setObjectName("down_arrow")
        self.left_arrow = QtWidgets.QLabel(self.page)
        self.left_arrow.setGeometry(QtCore.QRect(320, 120, 21, 71))
        self.left_arrow.setText("")
        self.left_arrow.setPixmap(QtGui.QPixmap("images/left-arrow.gif"))
        self.left_arrow.setScaledContents(True)
        self.left_arrow.setObjectName("left_arrow")
        self.stackedWidget.addWidget(self.page)
        self.page_2 = QtWidgets.QWidget()
        self.page_2.setObjectName("page_2")
        self.mplwindow_3 = QtWidgets.QWidget(self.page_2)
        self.mplwindow_3.setEnabled(False)
        self.mplwindow_3.setGeometry(QtCore.QRect(30, 40, 311, 271))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Preferred, QtWidgets.QSizePolicy.Preferred)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.mplwindow_3.sizePolicy().hasHeightForWidth())
        self.mplwindow_3.setSizePolicy(sizePolicy)
        self.mplwindow_3.setMaximumSize(QtCore.QSize(573, 16777215))
        self.mplwindow_3.setMouseTracking(False)
        self.mplwindow_3.setObjectName("mplwindow_3")
        self.mplvl_3 = QtWidgets.QVBoxLayout(self.mplwindow_3)
        self.mplvl_3.setSpacing(7)
        self.mplvl_3.setContentsMargins(0, 0, 0, 0)
        self.mplvl_3.setObjectName("mplvl_3")
        self.label = QtWidgets.QLabel(self.page_2)
        self.label.setGeometry(QtCore.QRect(10, 10, 161, 19))
        self.label.setObjectName("label")
        self.right_arrow = QtWidgets.QLabel(self.page_2)
        self.right_arrow.setGeometry(QtCore.QRect(0, 100, 21, 91))
        self.right_arrow.setText("")
        self.right_arrow.setPixmap(QtGui.QPixmap("images/right-arrow.gif"))
        self.right_arrow.setScaledContents(True)
        self.right_arrow.setObjectName("right_arrow")
        self.stackedWidget.addWidget(self.page_2)
        self.page_3 = QtWidgets.QWidget()
        self.page_3.setObjectName("page_3")
        self.label_2 = QtWidgets.QLabel(self.page_3)
        self.label_2.setGeometry(QtCore.QRect(10, 20, 161, 19))
        self.label_2.setObjectName("label_2")
        self.listWidget = QtWidgets.QListWidget(self.page_3)
        self.listWidget.setGeometry(QtCore.QRect(10, 40, 321, 261))
        self.listWidget.setObjectName("listWidget")
        self.up_arrow = QtWidgets.QLabel(self.page_3)
        self.up_arrow.setGeometry(QtCore.QRect(140, 0, 71, 21))
        self.up_arrow.setText("")
        self.up_arrow.setPixmap(QtGui.QPixmap("images/up_arrow.gif"))
        self.up_arrow.setScaledContents(True)
        self.up_arrow.setObjectName("up_arrow")
        self.stackedWidget.addWidget(self.page_3)
        MainWindow.setCentralWidget(self.centralwidget)

        self.retranslateUi(MainWindow)
        self.stackedWidget.setCurrentIndex(0)
        QtCore.QMetaObject.connectSlotsByName(MainWindow)

    def retranslateUi(self, MainWindow):
        _translate = QtCore.QCoreApplication.translate
        MainWindow.setWindowTitle(_translate("MainWindow", "MainWindow"))
        self.label.setText(_translate("MainWindow", "Subjects"))
        self.label_2.setText(_translate("MainWindow", "Games!"))

    def add_medal(self, name, x_translation):
        self.name = QtWidgets.QLabel(self.premios)
        self.name.setEnabled(True)
        self.name.setGeometry(QtCore.QRect(x_translation, 10, 51, 61))
        self.name.setFrameShape(QtWidgets.QFrame.NoFrame)
        self.name.setText("")
        self.name.setPixmap(QtGui.QPixmap("images/medal.png"))
        self.name.setScaledContents(True)
        self.name.setObjectName(name)

    def add_trophy(self, name, x_translation):
        self.name = QtWidgets.QLabel(self.premios)
        self.name.setEnabled(True)
        self.name.setGeometry(QtCore.QRect(x_translation, 10, 51, 61))
        self.name.setFrameShape(QtWidgets.QFrame.NoFrame)
        self.name.setText("")
        self.name.setPixmap(QtGui.QPixmap("images/trophy.png"))
        self.name.setScaledContents(True)
        self.name.setObjectName(name)

if __name__ == "__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    MainWindow = QtWidgets.QMainWindow()
    ui = Ui_MainWindow()
    ui.setupUi(MainWindow)
    MainWindow.show()
    sys.exit(app.exec_())

