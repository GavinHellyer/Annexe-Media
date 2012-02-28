/**
 * @ver 1.0
 * jQuery View Templates
 */
var TemplateCore = Class.create({
  template: '',
  data: '',
  view: '',
  render: '',
  target: '',

  init: function(template) {
    this.template = template;
  },

  validate: function(data) {
    if (data == undefined) {
      return 'Unknown';
    }
    return data;
  },

  loadData: function(data) {
    this.data = data;
  },

  getTemplate: function(render) {
    jQuery.ajax({
      url: '?template=' + this.template,
      success: render
    });
  },

  replaceViewItem: function(item) {
    var eval_string = "var render = '" +
      this.view.replace(/\{/g, "' + this.validate(")
        .replace(/\}/g, ") + '")
        .replace(/\n/g, "' + \n'")
        .replace(/\r/g, "") + "';";
    eval(eval_string);
    return render;
  },

  renderViewInto: function(object) {
    object.html(this.render);
  }
});

/**
 *  Template Code
 */
var TplFileList = Class.create({
  core: '',

  init: function(data, target) {
    this.core = new TemplateCore('file_list');
    this.core.loadData(data);
    this.core.target = target;
  },

  render: function() {
    var me = this;
    this.core.getTemplate(function(view) {
      me.core.view = view;
      var data = me.core.data.data
      for (var loc in data) {
        var files = data[loc].files;
        me.getFiles(me.core, files);
      }
      me.core.render = '<div class="tpl-file-list">' + me.core.render + '</div>';
      me.core.renderViewInto(me.core.target);
      hiddenData();
    });
  },

  getFiles: function(core, files) {
    for (var index in files) {
      var file = files[index];
      if (file.file != undefined) {
        core.render += core.replaceViewItem(file);
      } else {
        this.getFiles(core, file);
      }
    }
  }
});

jQuery.fn.outerHTML = function(s) {
  return s
    ? this.before(s).remove()
    : jQuery("<p>").append(this.eq(0).clone()).html();
};