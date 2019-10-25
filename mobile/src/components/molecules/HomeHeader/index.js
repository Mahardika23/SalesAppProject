import React from 'react';
import {View,Text, Image} from 'react-native';

const HomeHeader = () => {
    return (
        <View>
            <Text 
                style={{
                textAlign: 'center',
                fontSize: 22,
                fontWeight: 'bold',
                paddingTop: 25
                }}
            >SALES APP</Text>
            <Image 
                style={{
                alignSelf:'center',
                marginVertical: 15,
                width: 80,
                height: 80
                }}
            source={require('../../../assets/logo/logo.png')}/>
        </View>
    )
} 

export default HomeHeader;