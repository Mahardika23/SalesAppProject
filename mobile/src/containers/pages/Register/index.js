import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button} from 'react-native';
import DataForm from '../../../components/molecules/DataForm';
import { TextInput } from 'react-native-gesture-handler';
import FormRegister from '../../organisms/FormRegister';

const Register = (props) => {
    return(

        <View style={{flex:1, margin: 30}}>
            <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                <LogoTitle/>
                <Text style={{fontSize:20}}>Daftar</Text>
                <FormRegister/>
                <View style={{width: 120, paddingTop:10, borderRadius:20,}}>
                <Button
                    color='#4A3D53'
                    title="Daftar"
                    style={{fontSize:40}}
                    onPress={() => props.navigation.navigate('Login')}
                />
                </View>
            </View>
        </View>
    )
}

export default Register;