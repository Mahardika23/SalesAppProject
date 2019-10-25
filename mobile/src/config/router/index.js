import React from 'react';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';
import { Home,Login,Register,Register2,Cart } from '../../containers/pages';



const AppNavigator = createStackNavigator(
  {
    Home : {
        screen: Home,
    },
    Login: {
        screen: Login,
    },
    Register: {
        screen: Register,
    },
    Register2:{
      screen: Register2,
    },
    Cart:{
      screen: Cart,
    }
  },
  {
    initialRouteName: 'Home',
    headerMode: 'none',
  }
);


const AppContainer =  createAppContainer(AppNavigator);

export default AppContainer;