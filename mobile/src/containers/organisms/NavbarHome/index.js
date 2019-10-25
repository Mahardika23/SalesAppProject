import React from 'react';
import NavbarFeature from '../../../components/molecules/NavbarFeature';
import {View} from 'react-native';
import { tsPropertySignature } from '@babel/types';
        
const NavbarHome = (props) => {
    return (
        <View style={{height:55,backgroundColor:'white', flexDirection: 'row'}}>
            <NavbarFeature img={require('../../../assets/icon/home-active.png')} title="Home" active navigate={() => props.navigation.navigate('Home')}/>
            <NavbarFeature img={require('../../../assets/icon/activity.png')} title="Aktivitas" navigate={() => props.navigation.navigate('Login')}/>
            <NavbarFeature img={require('../../../assets/icon/cart.png')} title="Pesanan" navigate={() => props.navigation.navigate('Register')}/>
            <NavbarFeature img={require('../../../assets/icon/me.png')} title="Saya" navigate={() => props.navigation.navigate('Login')}/>
        </View>
    )
}

export default NavbarHome;