class Document
  include Mongoid::Document
  belongs_to :repository

  field :name
  field :uri
  field :type
  field :size
  field :full_path
  
end
