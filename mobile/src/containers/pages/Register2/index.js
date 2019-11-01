import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button,TouchableHighlight,Alert} from 'react-native';
// import DataForm from '../../../components/molecules/DataForm';
import ValidationComponent from 'react-native-form-validator';
import { TextInput, TouchableOpacity } from 'react-native-gesture-handler';

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
            />
        </View>
    )
}

export default class Register extends ValidationComponent {

    constructor(props) {
        super(props);
        this.state = {username : "", password1: "", password2:""};
        this._onPressButton=this._onPressButton.bind(this)
    }

    showAlert= () =>{
        Alert.alert(
            'Error',
            
            this.getErrorMessages(),
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: true},
          );
    }

    passDifferent= () =>{
        Alert.alert(
            'Error',
            
            'konfirmasi Password berbeda',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: true},
          );
    }

    passInvalid= () =>{
        Alert.alert(
            'Error',
            
            'Password minimal 8 karakter',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: true},
          );
    }

    _onPressButton() {
        // Call ValidationComponent validate method
        this.validate({
        username: {maxlength:255, required: true},
        password1: {minlength:8, required: true},
        password2: {minlength:8, required: true},
        });
        if(this.isFieldInError("password1")){
            this.passInvalid()
        }
        else if(this.state.password1!=this.state.password2){
            this.passDifferent()
        }
        else if(this.isFormValid()==false){
            this.showAlert()
        }
        else{
            this.props.navigation.navigate('Register',{username:this.state.username, password:this.state.password1})
        }

    }
 
    render(props) {
        
        return(

            <View style={{flex:1, margin:30}}>
                <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                    <LogoTitle/>
                    <Text style={{fontSize:20}}>Daftar</Text>

                    {/* Used */}
                    <DataForm FormName="Username" ref="username" deviceLocale="id" changeText={(username) => this.setState({username})}/>
                    <DataForm FormName="Password" Password={true} ref="password1" deviceLocale="id" changeText={(password1) => this.setState({password1})}/>
                    <DataForm FormName="Konfirmasi Password" Password={true} ref="password2" deviceLocale="id" changeText={(password2) => this.setState({password2})}/> 

                    
                    <View style={{width: 120, paddingTop:10, borderRadius:20,}}>
                    <Button
                        color='#4A3D53'
                        title="Selanjutnya"
                        style={{fontSize:60}}
                        onPress={this._onPressButton}
                    /> 
                    
                    </View>

                        {/* Testing Validator */}
                        {/* <TextInput ref="name" deviceLocale="id" onChangeText={(name) => this.setState({name})} value={this.state.name} />
                        <TextInput ref="email" deviceLocale="id" onChangeText={(email) => this.setState({email})} value={this.state.email} />
                        <TextInput ref="number" deviceLocale="id" onChangeText={(number) => this.setState({number})} value={this.state.number} />
                                        
                        <TouchableHighlight onPress={this._onPressButton}>
                            <Text>Submit</Text>
                        </TouchableHighlight> */}

                    
                </View>
            </View>
        );
    }
}

// export default Register;