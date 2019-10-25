import React from 'react';
import {TextInput, Text, View, Button} from 'react-native';

const LoginInput = (props) => {
    return(
        <View style={{alignItems: 'center'}}>
            <Text style={{fontSize:22, marginVertical: 10}}>Masuk</Text>
            <TextInput placeholder="username"
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
            />
            <TextInput placeholder="Password" secureTextEntry={true}
            style={{
                marginVertical:10,
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
            />
            <Button
            color='#4A3D53'
            title="Masuk"
            style={{fontSize:40}}

            onPress={props.navigate}
            />
        </View>
    )
}

export default LoginInput;