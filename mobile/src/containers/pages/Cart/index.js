import React from 'react';
import CatalogHome from '../../../containers/organisms/CatalogHome';
import SearchFeature from '../../../components/molecules/SearchFeature';
import HomeHeader from '../../../components/molecules/HomeHeader';
import NavbarHome from '../../../containers/organisms/NavbarHome';
import NavbarFeature from '../../../components/molecules/NavbarFeature';
import NumericInput from 'react-native-numeric-input';
import {
  View,
  ScrollView,
  Text,
  Button,
  Image,
  Alert,
} from 'react-native';
import TitleBar from '../../../components/molecules/TitleBar';
import { TextInput } from 'react-native-gesture-handler';
import ItemCart from '../../../components/molecules/ItemCart';

const Home = (props) => {
    const showAllert= () =>{
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
    return(
    <View style={{flex:1, backgroundColor:'#E7DFEC'}}>

        <View style={{height:55,backgroundColor:'white', alignItems:"center", justifyContent:'center', backgroundColor:'#E7DFEC'}}>
            <Text style={{fontSize:25,fontWeight:'bold'}}>Pesanan</Text>
        </View>
        {/* Content */}
        <ScrollView style={{flex:1, marginHorizontal:20, backgroundColor:'#E7DFEC'}}>

            {/* per-Distributor */}
            <View style={{marginVertical:5,paddingLeft:10,paddingBottom:10, backgroundColor:'white'}}>
                {/* Title = Distributor name and button */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10}}>Lets Think Distributor</Text>
                    <View style={{width:100, paddingTop:10,paddingRight:5}}>
                        <Button
                            color='#4A3D53'
                            title="Checkout"
                            style={{fontSize:40}}

                            onPress={showAllert}
                        />
                    </View>
                </View>

                {/* Total Values */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10, textAlign:'center'}}>Total :</Text>
                    <View style={{width:150, paddingTop:10}}>
                        <Text style={{fontSize:18, textAlign:'right'}}>Rp 2.000.000</Text>
                    </View>
                </View>

                {/* list item */}
                <ItemCart img={require('../../../assets/img/2.jpg')}/>
                <ItemCart img={require('../../../assets/img/1.jpg')}/>
                <ItemCart img={require('../../../assets/img/3.jpg')}/>

            </View>

            {/* per-Distributor */}
            <View style={{marginVertical:5,paddingHorizontal:10,paddingBottom:10, backgroundColor:'white'}}>
                {/* Title = Distributor name and button */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10}}>Lets Think Distributor</Text>
                    <View style={{width:100, paddingTop:10}}>
                        <Button
                            color='#4A3D53'
                            title="Checkout"
                            style={{fontSize:40}}

                            onPress={showAllert}
                        />
                    </View>
                </View>

                {/* Total Values */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10, textAlign:'center'}}>Total :</Text>
                    <View style={{width:150, paddingTop:10}}>
                        <Text style={{fontSize:18, textAlign:'right'}}>Rp 2.000.000</Text>
                    </View>
                </View>

                {/* list item */}
                <ItemCart img={require('../../../assets/img/3.jpg')}/>
                <ItemCart img={require('../../../assets/img/4.jpg')}/>

            </View>

            {/* per-Distributor */}
            <View style={{marginVertical:5,paddingHorizontal:10,paddingBottom:10, backgroundColor:'white'}}>
                {/* Title = Distributor name and button */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10}}>Lets Think Distributor</Text>
                    <View style={{width:100, paddingTop:10}}>
                        <Button
                            color='#4A3D53'
                            title="Menunggu Konfirmasi"
                            style={{fontSize:40}}
                            disabled
                            onPress={showAllert}
                        />
                    </View>
                </View>

                {/* Total Values */}
                <View style={{flexDirection:'row'}}>
                    <Text style={{fontSize:18, flex:1, paddingTop:10, textAlign:'center'}}>Total :</Text>
                    <View style={{width:150, paddingTop:10}}>
                        <Text style={{fontSize:18, textAlign:'right'}}>Rp 2.000.000</Text>
                    </View>
                </View>
                {/* list item */}
                <ItemCart img={require('../../../assets/img/1.jpg')}/>
                <ItemCart img={require('../../../assets/img/2.jpg')}/>

            </View>

        </ScrollView>

        {/* Navbar */}
        <View style={{height:55,backgroundColor:'white', flexDirection: 'row'}}>
            <NavbarFeature img={require('../../../assets/icon/home.png')} title="Beranda" navigate={() => props.navigation.navigate('Home')}/>
            <NavbarFeature img={require('../../../assets/icon/activity.png')} title="Aktivitas" navigate={() => props.navigation.navigate('Login')}/>
            <NavbarFeature img={require('../../../assets/icon/cart-active.png')} title="Pesanan" active navigate={() => props.navigation.navigate('Register')}/>
            <NavbarFeature img={require('../../../assets/icon/me.png')} title="Saya" navigate={() => props.navigation.navigate('Login')}/>
        </View>
    </View>
    )
}

export default Home;