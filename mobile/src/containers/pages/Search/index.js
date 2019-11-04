import React from 'react';
import CatalogHome from '../../../containers/organisms/CatalogHome';
import SearchFeature from '../../../components/molecules/SearchFeature';
import HomeHeader from '../../../components/molecules/HomeHeader';
import NavbarHome from '../../../containers/organisms/NavbarHome';
import NavbarFeature from '../../../components/molecules/NavbarFeature';
import ItemCart from '../../../components/molecules/ItemCart';
import {
  View,
  ScrollView,
  Text,
  TextInput,
  Image,
  Button,
  Alert,
} from 'react-native';
import TitleBar from '../../../components/molecules/TitleBar';
import ValidationComponent from 'react-native-form-validator';

const ItemSearch = (props) => {
    return(
        <View style={{flexDirection:'row', backgroundColor:'#E7DFEC',borderRadius:10, padding:10,marginBottom:15}}>
            <View style={{width:100, paddingTop:10}}>
                <Image style={{width:90, height:90,borderRadius:10}} source={require('../../../assets/img/2.jpg')}/>
            </View>
            <View style={{flex:1}}>
                <Text style={{fontSize:18, flex:1, paddingTop:5, textAlign:'left'}}>Antangin Batik</Text>
                <Text style={{fontSize:18, flex:1, paddingTop:0, textAlign:'left'}}>Rp 100.000</Text>
                <Text style={{fontSize:18, flex:1, paddingTop:0, textAlign:'left'}}>900 pcs</Text>
            </View>
            <View style={{width:20, justifyContent:'center'}}>
                    <Text style={{width:22, height:22, color:'green',fontWeight:'bold'}}>+</Text>
                {/* <Image style={{width:22, height:22}} source={require('../../../assets/icon/trash.png')}/> */}
            </View>
        </View>
    )
}

export default class Search extends ValidationComponent {
    showAllert= () =>{
        Alert.alert(
            'Checkout',
            'Pesan ke distributor sekarang?',
            [
              {
                text: 'Batal',
                onPress: () => console.log('Cancel Pressed'),
                style: 'cancel',
              },
              {text: 'Pesan', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }
    render(props){
        return(
        <View style={{flex:1, backgroundColor:'#E7DFEC', alignItems:'center'}}>

            <View style={{width:'100%', alignItems:'center'}}>
            <View style={{flexDirection:'row', paddingVertical:7}}>
                <TextInput placeholder="Nama produk, alamat..."
                    style={{
                        borderWidth:1,
                        borderRadius:10,
                        width:250,
                        height: 38,
                        fontSize: 13,
                        backgroundColor: 'white',
                        paddingLeft: 10,
                        paddingTop: 12,
                        paddingRight: 40
                    }}
                    onSubmitEditing={() => this.props.navigation.navigate('Search')}
                    />
                <Image style={{width:30,height:30,marginLeft:-35,marginTop:5}} source={require('../../../assets/icon/search.png')}/>
            </View>
            </View>
            <ScrollView style={{ flex:1, width:'100%', paddingHorizontal:15}}>
                <View style={{backgroundColor:'white', padding:15}}>
                    <ItemSearch/>
                    <ItemSearch/>
                    <ItemSearch/>
                    <ItemSearch/>
                    <ItemSearch/>
                    <ItemSearch/>
                </View>
            </ScrollView>


            {/* Navbar */}
            <View style={{height:55,backgroundColor:'white', flexDirection: 'row'}}>
                <NavbarFeature img={require('../../../assets/icon/home-active.png')} title="Beranda" active navigate={() => this.props.navigation.navigate('Home')}/>
                <NavbarFeature img={require('../../../assets/icon/activity.png')} title="Aktivitas" navigate={() => this.props.navigation.navigate('Login')}/>
                <NavbarFeature img={require('../../../assets/icon/cart.png')} title="Pesanan" navigate={() => this.props.navigation.navigate('Cart')}/>
                <NavbarFeature img={require('../../../assets/icon/me.png')} title="Saya" navigate={() => this.props.navigation.navigate('Login')}/>
            </View>
        </View>
        );
    }
}

