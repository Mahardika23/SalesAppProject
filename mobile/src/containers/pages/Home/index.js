import React from 'react';
import CatalogHome from '../../../containers/organisms/CatalogHome';
import SearchFeature from '../../../components/molecules/SearchFeature';
import HomeHeader from '../../../components/molecules/HomeHeader';
import NavbarHome from '../../../containers/organisms/NavbarHome';
import NavbarFeature from '../../../components/molecules/NavbarFeature';
import {
  View,
  ScrollView,
} from 'react-native';
import TitleBar from '../../../components/molecules/TitleBar';

const Home = (props) => {
    return(
    <View style={{flex:1, backgroundColor:'#E7DFEC'}}>

        {/* Content */}
        <ScrollView style={{flex:1}}>

        {/* Header and logo on Home */}
        <View>
            <HomeHeader/>
        </View>

        {/* Search Bar */}
        <View style={{alignSelf: 'center'}}>
            <SearchFeature/>
        </View>

        {/* Katalog Produk */}
        <View style={{marginVertical:15}}>
            <TitleBar title="Katalog Produk"/>
            <ScrollView horizontal={true}>
            <CatalogHome/>
            </ScrollView>
        </View>

        {/* Maps */}
        <View style={{marginVertical:15}}>
            <TitleBar title="Peta"/>
            {/* <Text 
            style={{
                marginTop: 10,
                marginBottom: 10,
                marginHorizontal: 30,
                fontSize: 16
            }}
            >Peta</Text> */}
            <View style={{width:300,height:300,backgroundColor:'blue', marginHorizontal:30}}></View>
        </View>
        </ScrollView>

        {/* Navbar */}
        <View style={{height:55,backgroundColor:'white', flexDirection: 'row'}}>
            <NavbarFeature img={require('../../../assets/icon/home-active.png')} title="Beranda" active navigate={() => props.navigation.navigate('Home')}/>
            <NavbarFeature img={require('../../../assets/icon/activity.png')} title="Aktivitas" navigate={() => props.navigation.navigate('Login')}/>
            <NavbarFeature img={require('../../../assets/icon/cart.png')} title="Pesanan" navigate={() => props.navigation.navigate('Cart')}/>
            <NavbarFeature img={require('../../../assets/icon/me.png')} title="Saya" navigate={() => props.navigation.navigate('Login')}/>
        </View>
    </View>
    )
}

export default Home;