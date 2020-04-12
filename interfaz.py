# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file 'interfaz.ui'
#
# Created: Fri Apr 10 13:58:38 2020
#      by: PyQt5 UI code generator 5.3.2
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_MainWindow(object):
    def setupUi(self, MainWindow):
        MainWindow.setObjectName("MainWindow")
        MainWindow.resize(330, 340)
        self.centralwidget = QtWidgets.QWidget(MainWindow)
        self.centralwidget.setObjectName("centralwidget")
        self.buttonBox = QtWidgets.QDialogButtonBox(self.centralwidget)
        self.buttonBox.setGeometry(QtCore.QRect(10, 300, 301, 32))
        self.buttonBox.setOrientation(QtCore.Qt.Horizontal)
        self.buttonBox.setStandardButtons(QtWidgets.QDialogButtonBox.Cancel|QtWidgets.QDialogButtonBox.Ok)
        self.buttonBox.setCenterButtons(True)
        self.buttonBox.setObjectName("buttonBox")
        self.label = QtWidgets.QLabel(self.centralwidget)
        self.label.setGeometry(QtCore.QRect(80, 270, 171, 21))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Expanding, QtWidgets.QSizePolicy.Expanding)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.label.sizePolicy().hasHeightForWidth())
        self.label.setSizePolicy(sizePolicy)
        self.label.setMinimumSize(QtCore.QSize(100, 0))
        self.label.setMaximumSize(QtCore.QSize(300, 51))
        self.label.setAlignment(QtCore.Qt.AlignCenter)
        self.label.setObjectName("label")
        self.mplwindow = QtWidgets.QWidget(self.centralwidget)
        self.mplwindow.setEnabled(False)
        self.mplwindow.setGeometry(QtCore.QRect(10, 20, 151, 151))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Preferred, QtWidgets.QSizePolicy.Preferred)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.mplwindow.sizePolicy().hasHeightForWidth())
        self.mplwindow.setSizePolicy(sizePolicy)
        self.mplwindow.setMaximumSize(QtCore.QSize(573, 16777215))
        self.mplwindow.setObjectName("mplwindow")
        self.mplvl = QtWidgets.QVBoxLayout(self.mplwindow)
        self.mplvl.setContentsMargins(0, 0, 0, 0)
        self.mplvl.setObjectName("mplvl")
        self.mplwindow_2 = QtWidgets.QWidget(self.centralwidget)
        self.mplwindow_2.setEnabled(False)
        self.mplwindow_2.setGeometry(QtCore.QRect(170, 20, 151, 151))
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
        self.premios = QtWidgets.QWidget(self.centralwidget)
        self.premios.setGeometry(QtCore.QRect(10, 180, 311, 80))
        self.premios.setObjectName("premios")


        MainWindow.setCentralWidget(self.centralwidget)

        self.retranslateUi(MainWindow)
        QtCore.QMetaObject.connectSlotsByName(MainWindow)

    def retranslateUi(self, MainWindow):
        _translate = QtCore.QCoreApplication.translate
        MainWindow.setWindowTitle(_translate("MainWindow", "MainWindow"))
        self.label.setText(_translate("MainWindow", "TextLabel"))

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
