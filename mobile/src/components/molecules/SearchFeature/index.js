import React from 'react';
import {View, TextInput, Image, TouchableOpacity} from 'react-native';

const SearchFeature = (props) => {
    return (
      <View style={{flexDirection:'row'}}>
        <TextInput placeholder="Nama produk, alamat..."
          style={{
            borderWidth:1,
            borderRadius:10,
            width:250,
            height: 38,
            fontSize: 13,
            backgroundColor: 'white',
            paddingLeft: 10,
            paddingTop: 12,
            paddingRight: 40
          }}
          onSubmitEditing={props.navigate}
        />
        <TouchableOpacity>
        <Image style={{width:30,height:30,marginLeft:-35,marginTop:5}} source={require('../../../assets/icon/search.png')}/>
        </TouchableOpacity>
      </View>
    )
}

export default SearchFeature;