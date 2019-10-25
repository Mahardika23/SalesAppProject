import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import LoginInput from '../../../components/molecules/LoginInput';
import {
    View,
    Text
  } from 'react-native';
import { TouchableOpacity } from 'react-native-gesture-handler';

const Login = (props) => {
    return(
        <View style={{flex:1}}>
            <View style={{flex:1, alignItems: 'center', justifyContent:'center',margin:15}}>
                <LogoTitle/>
                <LoginInput navigate={() => props.navigation.navigate('Home')}/>
                <View style={{flexDirection:"row", marginVertical:20}}>
                    <Text style={{paddingRight: 110, color:"navy", textDecorationLine:"underline"}}>Lupa password</Text>
                    <TouchableOpacity onPress={() => props.navigation.navigate('Register2')}>
                        <Text style={{ color:"navy", textDecorationLine:"underline"}}>Daftar</Text>
                    </TouchableOpacity>
                </View>
            </View>
        </View>
    )
}

export default Login;