import React from 'react';

import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';

import TitleBar from './src/components/molecules/TitleBar';
import CatalogHome from './src/containers/organisms/CatalogHome';
import SearchFeature from './src/components/molecules/SearchFeature';
import HomeHeader from './src/components/molecules/HomeHeader';
import NavbarHome from './src/containers/organisms/NavbarHome';
import LogoTitle from './src/components/molecules/LogoTitle';
import LoginInput from './src/components/molecules/LoginInput';
import Login from './src/containers/pages/Login';
import Register from './src/containers/pages/Register';
import Home from './src/containers/pages/Home';
import Cart from './src/containers/pages/Cart';
import AppContainer from './src/config/router';
import Search from './src/containers/pages/Search';

import {
  View,
  Text,
  Image,
  TextInput,
  ScrollView,
  Button,
  Alert
} from 'react-native';




const App = () => {
  return(
    <AppContainer/>
  );
};

export default App;