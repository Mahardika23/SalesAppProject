import React from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button,TouchableHighlight,Alert} from 'react-native';
import { Form, TextValidator } from 'react-native-validator-form';
import DataForm from '../../../components/molecules/DataForm';
import ValidationComponent from 'react-native-form-validator';
import { TextInput, TouchableOpacity } from 'react-native-gesture-handler';

export default class Register extends ValidationComponent {

    constructor(props) {
        super(props);
        this.state = {name : "My name", email: "tibtib@gmail.com", number:"56", date: "2017-03-01"};
      }

    _onPressButton() {
        // Call ValidationComponent validate method
        this.validate({
        name: {minlength:3, maxlength:7, required: true},
        email: {email: true},
        number: {numbers: true},
        });
    }
 
    render(props) {
        
        return(

            <View style={{flex:1, margin:30}}>
                <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                    <LogoTitle/>
                    <Text style={{fontSize:20}}>Daftar</Text>

                    {/* Used
                    <DataForm FormName="Username"/>
                    <DataForm FormName="Password" Password={true}/>
                    <DataForm FormName="Konfirmasi Password" Password={true}/> 

                    
                    <View style={{width: 120, paddingTop:10, borderRadius:20,}}>
                    <Button
                        color='#4A3D53'
                        title="Selanjutnya"
                        style={{fontSize:60}}
                        onPress={() => this.props.navigation.navigate('Register')}
                    /> 
                    
                    </View>*/}

                        {/* Testing Validator */}
                        <TextInput ref="name" onChangeText={(name) => this.setState({name})} value={this.state.name} />
                        <TextInput ref="email" onChangeText={(email) => this.setState({email})} value={this.state.email} />
                        <TextInput ref="number" onChangeText={(number) => this.setState({number})} value={this.state.number} />
                                        
                        <TouchableHighlight onPress={this._onPressButton}>
                            <Text>Submit</Text>
                        </TouchableHighlight>


                        <Text>
                            {this.getErrorMessages()}
                        </Text>
                    
                </View>
            </View>
        );
    }
}

// export default Register;