// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class HelloWorld extends Component {

  static slug = 'diviwmex_hello_world';

  render() {
    debugger
      console.log(this.props);
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default HelloWorld;
