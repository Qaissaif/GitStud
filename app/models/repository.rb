class Repository
  include Mongoid::Document

 # has_and_belongs_to_many :students
 # has_many :files
 # belongs_to :assignment

  field :url
  field :name
  field :super_std

end
