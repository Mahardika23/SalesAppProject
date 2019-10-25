import React from 'react';
import {View, Image,Text,TouchableOpacity} from 'react-native';

const NavbarFeature = (props) => {
    return(

      <View style={{flex:1, alignItems:'center', justifyContent:'center', paddingTop:2}}>
        
      <TouchableOpacity onPress={props.navigate}>
        <View style={{width:26, height:26}}>
          <Image style={{width:26,height:26}} source={props.img}/>
        </View>
        <Text style={{fontSize:9,color: props.active ? '#43AB4A' : '#545454', marginTop:4}}>{props.title}</Text>

      </TouchableOpacity>
      </View>
    )
  }

export default NavbarFeature;