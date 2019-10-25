import React from 'react';
import {View, Image,Text} from 'react-native';

const ItemFeature = (props) => {
    return (
      <View style={{width:130, height:200,marginHorizontal:10, borderRadius:10}}>
        <View style={{width:130, height:147}}>
          <Image style={{width:130, height:150,borderRadius:10}} source={props.img}/>
        </View>
        <Text style={{fontSize:17, marginVertical:3, marginHorizontal:3}}>{props.itemName}</Text>
      </View>
    )
  }

export default ItemFeature;