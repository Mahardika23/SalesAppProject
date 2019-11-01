import React from 'react';
import DataForm from '../../../components/molecules/DataForm';
import {Dropdown} from 'react-native-material-dropdown';
import {View,Text} from 'react-native';

const FormRegister = (props) => {
        let data = [{
          value: 'Banana',
        }, {
          value: 'Mango',
        }, {
          value: 'Pear',
        }];

    return(
        <View style={{width:'100%'}}>
            <DataForm FormName="Nama toko"/>
            <DataForm FormName="Nama Pemilik"/>
            <View style={{flexDirection:"row", marginVertical:3}}>
                <Text style={{marginTop: 7, width:115, fontSize:15}}>Lokasi</Text>
                <View style={{flex:1, marginTop:-30}}>
                    <Dropdown data={data} style={{marginTop:0}}/>
                </View>
            </View>
            <DataForm FormName="E-mail" keyboardType="email-address"/>
            <DataForm FormName="No.Telp" keyboardType="numeric"/>
        </View>
    )
}

export default FormRegister;