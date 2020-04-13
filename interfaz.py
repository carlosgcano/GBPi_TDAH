# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file 'interfaz.ui'
#
# Created: Mon Apr 13 20:01:52 2020
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
        self.premios.setGeometry(QtCore.QRect(20, 190, 311, 80))
        self.premios.setObjectName("premios")
        self.buttonBox = QtWidgets.QDialogButtonBox(self.page)
        self.buttonBox.setGeometry(QtCore.QRect(20, 270, 301, 32))
        self.buttonBox.setOrientation(QtCore.Qt.Horizontal)
        self.buttonBox.setStandardButtons(QtWidgets.QDialogButtonBox.Cancel|QtWidgets.QDialogButtonBox.Ok)
        self.buttonBox.setCenterButtons(True)
        self.buttonBox.setObjectName("buttonBox")
        self.mplwindow = QtWidgets.QWidget(self.page)
        self.mplwindow.setEnabled(False)
        self.mplwindow.setGeometry(QtCore.QRect(20, 30, 151, 151))
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
        self.mplwindow_2.setGeometry(QtCore.QRect(180, 30, 151, 151))
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
        self.stackedWidget.addWidget(self.page)
        self.page_2 = QtWidgets.QWidget()
        self.page_2.setObjectName("page_2")
        self.mplwindow_3 = QtWidgets.QWidget(self.page_2)
        self.mplwindow_3.setEnabled(False)
        self.mplwindow_3.setGeometry(QtCore.QRect(10, 10, 331, 251))
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Preferred, QtWidgets.QSizePolicy.Preferred)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.mplwindow_3.sizePolicy().hasHeightForWidth())
        self.mplwindow_3.setSizePolicy(sizePolicy)
        self.mplwindow_3.setMaximumSize(QtCore.QSize(573, 16777215))
        self.mplwindow_3.setMouseTracking(False)
        self.mplwindow_3.setObjectName("mplwindow_3")
        self.mplvl_3 = QtWidgets.QVBoxLayout(self.mplwindow_3)
        self.mplvl_3.setContentsMargins(0, 0, 0, 0)
        self.mplvl_3.setObjectName("mplvl_3")
        self.stackedWidget.addWidget(self.page_2)
        MainWindow.setCentralWidget(self.centralwidget)

        self.retranslateUi(MainWindow)
        self.stackedWidget.setCurrentIndex(1)
        QtCore.QMetaObject.connectSlotsByName(MainWindow)

    def retranslateUi(self, MainWindow):
        _translate = QtCore.QCoreApplication.translate
        MainWindow.setWindowTitle(_translate("MainWindow", "MainWindow"))

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