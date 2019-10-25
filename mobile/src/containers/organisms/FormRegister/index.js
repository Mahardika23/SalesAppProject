import React from 'react';
import DataForm from '../../../components/molecules/DataForm';
import {View} from 'react-native';

const FormRegister = () => {
    return(
        <View style={{width:'100%'}}>
            <DataForm FormName="Nama toko"/>
            <DataForm FormName="Alamat"/>
            <DataForm FormName="Nama Pemilik"/>
            <DataForm FormName="E-mail"/>
            <DataForm FormName="No.Telp"/>
        </View>
    )
}

export default FormRegister;