import React, {Component} from 'react';
import LogoTitle from '../../../components/molecules/LogoTitle';
import {View, Text, Button,Alert} from 'react-native';
import { TextInput } from 'react-native-gesture-handler';
import FormRegister from '../../organisms/FormRegister';
import ValidationComponent from 'react-native-form-validator';
import {Dropdown} from 'react-native-material-dropdown';
import axios from 'axios';


class DropForm extends Component{


  constructor(props) {
    super(props)
    this.state = {
        name: []
    };
  }
  componentDidMount() {
    axios.get(`http://192.168.1.65:8000/api/province`)
      .then(function(response) {
        console.log(response.data);
        console.log(response.status);
        console.log(response.statusText);
        console.log(response.headers);
        console.log(response.config);
      }
    )
  }


    render(props){
    let data = [{
        value: 'Sini',
      }, {
        value: 'situ',
      }, {
        value: 'sana',
      }];

      return(
        <View style={{flexDirection:"row", marginVertical:3}}>
            <Text style={{marginTop: 7, width:115, fontSize:15}}>{this.props.areaName}</Text>
            <View style={{flex:1, marginTop:-30}}>
                <Dropdown 
                placeholder="pilih"
                data={data} 
                style={{marginTop:0}}
                ref={this.props.ref}
                deviceLocale="id" 
                onChangeText={this.props.changeText}/>
            </View>
        </View>
    );
    }
}

export default class Register extends ValidationComponent {

    constructor(props) {
        super(props);
        this.state = {province_id : "",regency_id: "", district_id:"",village_id :""};
        this._onPressButton=this._onPressButton.bind(this)
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
        province_id: {required: true},
        regency_id: {required: true},
        district_id: {required: true,},
        village_id: {required:true}
        });if(this.isFormValid()==false){
            this.showAlert()
        }else{
            this.props.navigation.navigate('Login')
        }
    }

    render (props){
        return(

            <View style={{flex:1, margin: 30}}>
                <View style={{flex:1, alignItems: 'center', justifyContent:'center'}}>
                    <LogoTitle/>
                    <Text style={{fontSize:20}}>Alamat {this.props.navigation.state.params.nama_toko}</Text>
                    {/* <FormRegister/> */}
                    {/* <DataForm FormName="Nama Toko" ref="nama_toko" deviceLocale="id" changeText={(nama_toko) => this.setState({nama_toko})} />
                    <DataForm FormName="Nama Pemilik" ref="nama_pemilik" deviceLocale="id" changeText={(nama_pemilik) => this.setState({nama_pemilik})} />
                    <DataForm FormName="No Telp" keyboardType="phone-pad" ref="no_telp" deviceLocale="id" changeText={(no_telp) => this.setState({no_telp})} />
                    <DataForm FormName="Email" keyboardType="email-address" ref="email" deviceLocale="id" changeText={(email) => this.setState({email})} /> */}
                    
                    <DropForm areaName="Provinsi" ref="province_id" deviceLocale="id" changeText={(province_id) => this.setState({province_id})}/>
                    <DropForm areaName="Kabupaten/Kota" ref="regency_id" deviceLocale="id" changeText={(regency_id) => this.setState({regency_id})}/>
                    <DropForm areaName="Kecamatan" ref="district_id" deviceLocale="id" changeText={(district_id) => this.setState({district_id})}/>
                    <DropForm areaName="Kelurahan/Desa" ref="village_id" deviceLocale="id" changeText={(village_id) => this.setState({village_id})}/>

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
