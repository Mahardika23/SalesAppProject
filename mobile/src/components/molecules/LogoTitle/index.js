import React from 'react';
import {Text,Image, View} from 'react-native';

const LogoTitle = () => {
    return(
        <View>
            <Text 
                style={{
                fontSize: 40,
                fontWeight: 'bold'
                }}
            >SALES APP</Text>
            <Image 
                style={{
                alignSelf:'center',
                marginVertical: 15,
                width: 180,
                height: 180
                }}
            source={require('../../../assets/logo/logo.png')}/>
        </View>

    )
}

export default LogoTitle;