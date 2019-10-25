import React from 'react';
import {View,Text,TextInput} from 'react-native';

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

            />
        </View>
    )
}

export default DataForm;