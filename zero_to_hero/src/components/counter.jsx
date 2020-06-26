import React, { Component } from 'react'

export default class Counter extends Component {
    state = {
        count: this.props.value,
        tags: ['tag1', 'tag2', 'tag3', 'tag4']

    }
    setincrementhundler = () => {
        this.setState({ count: this.state.count + 1 })
    }
    render() {
        return (<div>
            <h6>counter number {this.props.id}</h6>
            <span>{this.state.count}</span>
            <button onClick={this.setincrementhundler}
                className="btn btn-primary">Increment</button>


        </div>);
    }
}


