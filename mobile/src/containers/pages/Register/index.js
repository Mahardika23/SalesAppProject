import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button,Alert} from 'react-native';
import { TextInput } from 'react-native-gesture-handler';
import FormRegister from '../../organisms/FormRegister';
import ValidationComponent from 'react-native-form-validator';

const DataForm = (props) => {
    return(
        <View style={{flexDirection:"row", marginVertical:3}}>
            <Text style={{marginTop: 7, width:115, fontSize:15}}>{props.FormName}</Text>
            <TextInput
                style={{
                    paddingTop:-10,
                    borderBottomWidth:1,
                    flex:1,
                    height: 30,
                    paddingBottom:-15,
                    backgroundColor: '#E7DFEC'
                }}
                secureTextEntry={props.Password}
                keyboardType={props.keyboardType}
                ref={props.ref}
                deviceLocale="id" 
                onChangeText={props.changeText}
                value={props.values}
            />
        </View>
    )
}

export default class Register extends ValidationComponent {

    constructor(props) {
        super(props);
        this.state = {username:"",password:"",nama_toko : "",nama_pemilik: "", no_telp:"",email :""};
        this._onPressButton=this._onPressButton.bind(this)
    }

    kosongAlert= () =>{
        Alert.alert(
            'Error',
            
            'Form belum terisi semua',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }

    nomorAlert= () =>{
        Alert.alert(
            'Error',
            
            'Nomor tidak valid',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }

    emailAlert= () =>{
        Alert.alert(
            'Error',
            
            'Email tidak valid',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }

    showAlert= () =>{
        Alert.alert(
            'Error',
            
            this.getErrorMessages(),
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
    }

    _onPressButton() {
        // Call ValidationComponent validate method
        this.validate({
        nama_toko: {maxlength:100, required: true},
        nama_pemilik: {maxlength:100, required: true},
        no_telp: {minlength:10,numbers:true, required: true,},
        email: {email:true, required:true}
        });
        
        if(this.isFieldInError("nama_toko") || this.isFieldInError("nama_pemilik")){
            this.kosongAlert()
        }
        else if(this.isFieldInError("no_telp")){
            this.nomorAlert()
        }
        else if(this.isFieldInError("email")){
            this.emailAlert()
        }
        else if(this.isFormValid()==false){
            this.showAlert()
        }else{
            this.props.navigation.navigate('RegisterArea',{
                username:this.props.navigation.state.params.username,
                password:this.props.navigation.state.params.password,
                nama_toko: this.state.nama_toko,
                nama_pemilik: this.state.nama_pemilik,
                no_telp: this.state.no_telp,
                email: this.state.email
            })
        }
    }

    render (props){

        const {navigate}=this.props.navigation;

        return(

            <View style={{flex:1, margin: 30}}>
                <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                    <LogoTitle/>
                    <Text style={{fontSize:20}}>Data Toko {this.props.navigation.state.params.username}</Text>
                    {/* <FormRegister/> */}
                    <DataForm FormName="Nama Toko" ref="nama_toko" deviceLocale="id" changeText={(nama_toko) => this.setState({nama_toko})}/>
                    <DataForm FormName="Nama Pemilik" ref="nama_pemilik" deviceLocale="id" changeText={(nama_pemilik) => this.setState({nama_pemilik})} />
                    <DataForm FormName="No Telp" keyboardType="phone-pad" ref="no_telp" deviceLocale="id" changeText={(no_telp) => this.setState({no_telp})} />
                    <DataForm FormName="Email" keyboardType="email-address" ref="email" deviceLocale="id" changeText={(email) => this.setState({email})} />
                    <View style={{width: 120, paddingTop:10, borderRadius:20,}}>
                    <Button
                        color='#4A3D53'
                        title="Daftar"
                        style={{fontSize:40}}
                        onPress={this._onPressButton}
                    />
                    </View>
                </View>
            </View>
        );
    }
}
