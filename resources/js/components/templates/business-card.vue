<template>
  <div class="creator">

    <card-sidebar
      v-bind:fields="fields" v-bind:card="card" @save="onSave">
    </card-sidebar>

    <card-content v-bind:fields="fields" v-bind:card="card">
      <div class="card--text">
        <h1 class="card--title">{{ fields.name.value || 'A.N.Other' }}</h1>
        <h2 class="card--subtitle">Covid-19 Volunteer</h2>
        <p v-if="fields.centre.value" class="card--centre">
          I’m volunteering on behalf of {{ fields.centre.value }}.
          <span v-if="fields.phone.value">To verify my credentials please call <span style="white-space: nowrap">{{ fields.phone.value }}.</span></span>
        </p>
        <p class="card--footer">volunteerwakefield.org</h2>

        <div v-drag class="card--image-container" :style="`background-image: url('${fields.image.value}')`">
        </div>
      </div>
    </card-content>


  </div>
</template>


<script>
  import drag from '../inc/v-drag'
  import html2canvas from 'html2canvas';
  import jsPDF from 'jspdf';
  import { saveAs } from 'file-saver';

  export default {

    directives: {
      drag
    },

    data: function() {
      return  {
        card: {
          format: 'print',
          template: 'business-card',
        },
        color: '#00CFD6',
        fields: {
          name: {
            id: "volunteerName",
            label: 'Volunteer name',
            type: 'text',
            length: 30,
            value: '',
          },
          centre: {
            id: "volunteerCentre",
            label: 'Volunteer centre',
            type: 'text',
            length: 40,
            value: '',
          },
          phone: {
            id: "volunteerPhone",
            label: 'Volunteer phone',
            type: 'text',
            length: 20,
            value: '',
          },
          image: {
            id: "volunteerImage",
            label: 'Volunteer image',
            type: 'image',
            value: ''
          }
        }
      }
    },

    methods: {
      onSave(event) {
        var node = document.getElementById('content');
        node.classList.add('rendering');
        html2canvas(node).then(function(canvas) {
          document.body.appendChild(canvas);
          var dataString = canvas.toDataURL('image/jpeg').slice('data:image/jpeg;base64,'.length);
          // var doc = new jsPDF('l', 'mm', 'credit-card', false);
          var doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: [241, 156]
          });
          doc.addImage(dataString, 'JPEG', 0, 0, 85, 55);
          doc.save('image.pdf');
          node.classList.remove('rendering');
        });
      }
    }
  }
</script>

<style>

  .card--text {
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
  }

  .card--title {
    font-size: 5em;
    color: #2763C3;
  }

  .card--subtitle {
    font-size: 4em;
    color: #2763C3;
    margin-bottom: 0.5em;
  }

  .card--footer {
    font-size: 3em;
    font-weight: 700;
    color: #2763C3;
    margin-bottom: 0;
    margin-top: auto;
    font-family: Faro, Yantramanav, -apple-system, BlinkMacSystemFont, "Avenir Next", "Avenir", "Segoe UI", "Lucida Grande", "Helvetica Neue", "Helvetica", "Fira Sans", "Roboto", "Noto", "Droid Sans", "Cantarell", "Oxygen", "Ubuntu", "Franklin Gothic Medium", "Century Gothic", "Liberation Sans", sans-serif;
  }

  .card--centre {
    font-size: 2.5em;
    color: #00BFAC;
    font-weight: 700;
    line-height: 1.3;
    width: 70%;
  }

  .card--image-container {
    position: absolute;
    bottom: 5em;
    right: 5em;
    width: 25%;
    padding-top: 25%;
    border-radius: 50%;
    overflow: hidden;
    background-size: cover;
    background-position: 50% 50%;
    cursor: grab;
    &.dragging {
      cursor: grabbing;
    }
  }

  .creator {
    display: flex;
    flex-direction: row;
  }

  [data-cardtemplate="business-card"] {
    font-size: 14px !important;
    width: 1013px;
    height: 638px;
    padding: 5em;
    position: absolute;
    left: 50%;
    top: 50%;
    border: 1px solid lightgray;
    transform: translate(-50%,-50%) scale(0.4);
    background-position: 630px 230px;
    background-repeat: no-repeat;
    background-size: 40%;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHdpZHRoPSIxMDAuMjhweCIgaGVpZ2h0PSIxMTAuOTVweCIgdmlld0JveD0iMCAwIDEwMC4yOCAxMTAuOTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwMC4yOCAxMTAuOTU7IgoJIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8cGF0aCBzdHlsZT0iZmlsbDojRkFCQ0RBOyIgZD0iTTI3Ljg0LDg2LjIzbC0wLjQzLTAuMzRjLTUuMDktNC4wMS0xMi41LTMuMTMtMTYuNTIsMS45NmMtMS45NCwyLjQ3LTIuODEsNS41NS0yLjQ0LDguNjYKCWMwLjM3LDMuMTIsMS45Myw1LjkxLDQuNCw3Ljg1bC01LjE4LDYuNThjLTQuMjMtMy4zMy02LjktOC4xLTcuNTQtMTMuNDRjLTAuNjQtNS4zNCwwLjg1LTEwLjYxLDQuMTctMTQuODMKCWM2LjctOC41MSwxOC45NC0xMC4xNSwyNy42My0zLjg1bDAuMDQsMC4wMWwwLjYxLDAuNDhjMC4zLDAuMjMsMC42LDAuNDUsMC45MSwwLjY1Ii8+CjxnIHN0eWxlPSJmaWxsOiNGMEVBMTk7Ij4KCTxwb2x5Z29uIGNsYXNzPSJzdDEiIHBvaW50cz0iNjEuMzgsMTA1LjEgNTcuODksMTAxLjc0IDcxLjg1LDc0LjY0IDc4LjcxLDc4LjE4IDY2LjA3LDEwMi43MiA2NC40NiwxMDEuODkgCSIvPgoJPHBvbHlnb24gY2xhc3M9InN0MSIgcG9pbnRzPSI2NC42MSwxMDguMiA2MS4xMiwxMDQuODQgNjQuMiwxMDEuNjQgNjMuMywxMDAuMDYgODcuMyw4Ni40MiA5MS4xMSw5My4xMyAJIi8+CjwvZz4KPHJlY3QgeD0iMTIuODkiIHk9IjIyLjI1IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjQxMjEgLTAuOTExMSAwLjkxMTEgMC40MTIxIC0yNC44MjY2IDM3LjYzNzMpIiBzdHlsZT0iZmlsbDojQTJEM0RGOyIgd2lkdGg9IjcuNzIiIGhlaWdodD0iMzEuNjIiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzRCQjM4QjsiIGQ9Ik04NC4wNCwzMy41Yy05LjIzLDAuMjgtMTYuOTctNy4wMS0xNy4yNS0xNi4yNEM2Ni41MSw4LjAzLDczLjc5LDAuMjksODMuMDIsMC4wMVMxMDAsNy4wMSwxMDAuMjcsMTYuMjUKCVM5My4yNywzMy4yMiw4NC4wNCwzMy41eiBNODMuMjYsNy43M2MtNC45OCwwLjE1LTguOSw0LjMyLTguNzUsOS4zYzAuMTUsNC45OCw0LjMyLDguOSw5LjMsOC43NWM0Ljk4LTAuMTUsOC45LTQuMzIsOC43NS05LjMKCVM4OC4yNCw3LjU4LDgzLjI2LDcuNzN6Ii8+Cjwvc3ZnPgo=);
  }

  .rendering {
    transform: scale(1) !important;
    position: absolute;
    top: 99999px;
    left: 99999px;
  }

  .loading-spinner {
    position: absolute;
    left: 50%;
    top: 50%;
    color: white;
    display: none;
  }

  #spinner {
    animation: rotate 1s infinite linear;
    transform-origin: center;
  }

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }

  .rendering + .loading-spinner {
    display: block;
  }


  #content {
    box-shadow: #333 0 15px 20px -10px;
    background-color: white;
    transition: width 100ms, height 100ms;
    flex: 0 0 auto;
  }
</style>
