import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button} from 'react-native';
import DataForm from '../../../components/molecules/DataForm';
import { TextInput, TouchableOpacity } from 'react-native-gesture-handler';

const Register = (props) => {
    return(

        <View style={{flex:1, margin:30}}>
            <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                <LogoTitle/>
                <Text style={{fontSize:20}}>Daftar</Text>
                <DataForm FormName="Username"/>
                <DataForm FormName="Password" Password={true}/>
                <DataForm FormName="Konfirmasi Password" Password={true}/>
                {/* <DataForm FormName="Password" Password={true}/>
                <View style={{width: '100%', height:45, marginTop:20, alignItems:'center', backgroundColor:'#4A3D53',justifyContent:'center'}}>
                    <TouchableOpacity onPress={() => props.navigation.navigate('Register')}>
                        <View>
                        <Text style={{color:'white', fontSize:15}}>SELANJUTNYA</Text>
                        </View>
                    </TouchableOpacity>
                </View> */}
                <View style={{width: 120, paddingTop:10, borderRadius:20,}}>
                <Button
                    color='#4A3D53'
                    title="Selanjutnya"
                    style={{fontSize:60}}
                    onPress={() => props.navigation.navigate('Register')}
                />
                </View>
                
            </View>
        </View>
    )
}

export default Register;