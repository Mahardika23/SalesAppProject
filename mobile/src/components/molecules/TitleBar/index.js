import React from 'react';
import {View, Text} from 'react-native';

const TitleBar = (props) => {
    return (
        <View>
          <Text 
            style={{
              marginTop: 10,
              marginBottom: 10,
              marginHorizontal: 30,
              fontSize: 16
            }}
          >{props.title}</Text>
        </View>
    )
}

export default TitleBar;