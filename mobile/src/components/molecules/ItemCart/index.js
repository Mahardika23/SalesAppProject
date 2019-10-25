import React from 'react';
import {View, Text,Image,Alert} from 'react-native';
import NumericInput from 'react-native-numeric-input';
import { TouchableOpacity } from 'react-native-gesture-handler';

const ItemCart = (props) => {
    const showAllert= () =>{
        Alert.alert(
            'Checkout',
            'Hapus item ini sekarang?',
            [
              {
                text: 'Batal',
                onPress: () => console.log('Cancel Pressed'),
                style: 'cancel',
              },
              {text: 'Hapus', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }
    return(
        <View style={{flexDirection:'row'}}>
            <View style={{width:100, paddingTop:10}}>
                <Image style={{width:90, height:90,borderRadius:10}} source={props.img}/>
            </View>
            <View style={{flex:1}}>
                <Text style={{fontSize:18, flex:1, paddingTop:10, textAlign:'left'}}>Antangin Batik</Text>
                <Text style={{fontSize:18, flex:1, paddingTop:10, textAlign:'left'}}>Rp 100.000</Text>
            </View>
            <View style={{width:70, marginRight:10, justifyContent:'center'}}>
            <NumericInput 
                initValue={1}
                onChange={value => console.log(value)}
                minValue={1}
                maxValue={100}
                totalWidth={60} 
                totalHeight={35} 
                iconSize={10}
                valueType='real'
                rounded 
                textColor='black' 
                iconStyle={{ color: 'black' }}/>
            </View>
            <View style={{width:20, justifyContent:'center'}}>
                <TouchableOpacity onPress={showAllert}>
                    <Text style={{width:22, height:22, color:'red',fontWeight:'bold'}}>x</Text>
                {/* <Image style={{width:22, height:22}} source={require('../../../assets/icon/trash.png')}/> */}
                </TouchableOpacity>
            </View>
        </View>
    )
}

export default ItemCart;